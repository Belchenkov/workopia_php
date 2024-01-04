<?php
namespace Framework;

class Validation
{
    /**
     * Validate a string
     *
     * @param string $value
     * @param int $min
     * @param mixed $max
     * @return bool
     */
    public static function string(string $value, int $min = 1, $max = INF): bool
    {
        if (is_string($value)) {
            $value = trim($value);
            $length = strlen($value);
            return $length >= $min && $length <= $max;
        }

        return false;
    }

    /**
     * Validate email address
     *
     * @param string $value
     * @return mixed
     */
    public static function email(string $value): mixed
    {
        $value = trim($value);

        return filter_var($value, FILTER_VALIDATE_URL);
    }

    /**
     * Match a value against another
     * @param string $value1
     * @param string $value2
     * @return bool
     */
    public static function match(string $value1, string $value2): bool
    {
        $value1 = trim($value1);
        $value2 = trim($value2);

        return $value1 === $value2;
    }
}
