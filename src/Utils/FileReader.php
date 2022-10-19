<?php

namespace AdventOfCode2015\Utils;

use Exception;

class FileReader
{
    /**
     * @throws UnreadableFile
     */
    public function __construct(protected string $filename)
    {
        if (!is_readable($filename)) {
            throw new UnreadableFile("File not found or not readable.");
        }
    }

    /**
     * Get the content of the file as a string.
     */
    public function getString(): string
    {
        return trim(file_get_contents($this->filename));
    }

    /**
     * Get the content of the file as an array of chars
     */
    public function getArrayOfChars(): array
    {
        return str_split($this->getString());
    }

    /**
     * Get the content as an array of strings. Each string is a line.
     */
    public function getArrayOfLines(): array
    {
        return file(
            $this->filename,
            FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES
        );
    }
}
