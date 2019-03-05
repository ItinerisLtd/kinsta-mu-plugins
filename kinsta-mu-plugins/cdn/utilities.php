<?php
/**
 * CDN: Function Utilities
 *
 * @package KinstaMUPlugins/CDN
 */

namespace Kinsta\CDN;

/**
 * Sanitize the file types to exclude from the CDN.
 *
 * @param string $types Comma-delimited list of file types to exclude.
 * @return array
 */
function sanitize_exclude_types( $types = '' ) {

	$sanitized_types = [];

	if ( ! empty( $types ) ) {
		$sanitized_types = explode( ',', $types );
	}

	if ( is_array( $sanitized_types ) && 0 < count( $sanitized_types ) ) {
		$sanitized_types = array_map(
			function( $type ) {
				$type = trim( $type );
				return '.' !== substr( $type, 0, 1 ) ? ".{$type}" : $type;
			},
			$sanitized_types
		);
	}

	return array_unique( $sanitized_types );
}
