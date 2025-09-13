<?php

declare(strict_types=1);

/**
 * ©️ copyright 2025 - johninamillion
 * 🙏🏻 The nakedness of thy father’s wife shalt thou not uncover: it is thy father’s nakedness. - Leviticus 18:8, KJV.
 */

namespace johninamillion\PHPCodeStyles;

/**
 * PHP Code Styles.
 *
 * @package johninamillion\PHPCodeStyles
 * @since 0.1.0
 */
class Composer
{
    /**
     * Callback for 'post-install-cmd'.
     *
     * @static
     * @return void
     */
    public static function install(): void
    {
        self::publishFile('.editorconfig');
        self::publishFile('.php-cs-fixer.php.dist');
        self::publishFile('phpstan.neon.dist');
    }

    /**
     * Callback for 'post-update-cmd'.
     *
     * @static
     * @return void
     */
    public static function update(): void
    {
        self::publishFile('.editorconfig');
        self::publishFile('.php-cs-fixer.php.dist');
        self::publishFile('phpstan.neon.dist');
    }

    /**
     * Copies a configuration file from the source to the target path.
     *
     * @static
     * @param  string      $source    The source path of the configuration file.
     * @param  string|null $target    The target path where the configuration file should be copied. If null, it defaults to the current working directory with the same name as the source file.
     * @param  bool        $overwrite Whether to overwrite the existing file if it exists.
     * @return void
     */
    protected static function publishFile(string $source, ?string $target = null, bool $overwrite = false): void
    {
        $source = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . $source;
        $basename = basename($source);
        $target = $target
            ? getcwd() . DIRECTORY_SEPARATOR . $target
            : getcwd() . DIRECTORY_SEPARATOR . $basename;

        if ($overwrite || !file_exists($target)) {
            echo copy($source, $target)
                ? "[php-code-styles] Success: Copied {$basename} to project root."
                : "[php-code-styles] Error: Could not copy {$basename} to project root.";
        }
    }
}
