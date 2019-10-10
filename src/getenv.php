<?php

namespace Pnoexz;

/**
 * @param string $key
 * @param bool   $localOnly
 * @return string
 * @throws \InvalidArgumentException
 */
function getenvAsString(
    string $key,
    bool $localOnly = false
): string {
    $value = \getenv($key, $localOnly);
    if (is_string($value)) {
        return (string) $value;
    }

    throw new \InvalidArgumentException(sprintf(
        'Environment variable %s was never set.',
        $key
    ));
}

/**
 * @param string $key
 * @param string $default
 * @param bool   $localOnly
 * @return string
 */
function getenvAsStringWithDefault(
    string $key,
    string $default,
    bool $localOnly = false
): string {
    $value = \getenv($key, $localOnly);
    if (is_string($value)) {
        return (string) $value;
    }

    return $default;
}

/**
 * @param string $key
 * @param bool   $localOnly
 * @return bool
 */
function getenvAsBoolDefaultToFalse(string $key, bool $localOnly = false): bool
{
    return \filter_var(
        \getenv($key, $localOnly),
        FILTER_VALIDATE_BOOLEAN,
        ['default' => false]
    );
}

/**
 * @param string $key
 * @param bool   $localOnly
 * @return bool
 */
function getenvAsBoolDefaultToTrue(
    string $key,
    bool $localOnly = false
): bool {
    return \filter_var(
        \getenv($key, $localOnly),
        FILTER_VALIDATE_BOOLEAN,
        ['default' => true]
    );
}
