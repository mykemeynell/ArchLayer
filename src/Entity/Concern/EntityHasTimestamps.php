<?php

namespace ArchLayer\Entity\Concern;

use Carbon\Carbon;

/**
 * Trait EntityHasTimestamps
 *
 * @package ArchLayer\Entity\Concern
 */
trait EntityHasTimestamps
{
    /**
     * Format for long timestamps.
     *
     * @var string
     */
    public $longTimestampFormat  = 'd M Y @ H:i';

    /**
     * Format for short timestamps.
     *
     * @var string
     */
    public $shortTimestampFormat  = 'd/m/Y';

    /**
     * Get created at timestamp.
     *
     * @return \Carbon\Carbon
     */
    public function getCreatedAt(): Carbon
    {
        return $this->created_at;
    }

    /**
     * Get updated at timestamp.
     *
     * @return \Carbon\Carbon
     */
    public function getUpdatedAt(): Carbon
    {
        return $this->updated_at;
    }

    /**
     * Get the created at timestamp.
     *
     * @param bool $short
     *
     * @return \Carbon\Carbon
     */
    public function getFormattedCreatedAt($short = false): string
    {
        $format = ($short) ? $this->shortTimestampFormat : $this->longTimestampFormat;

        return $this->getCreatedAt()->format($format);
    }

    /**
     * Get the updated at timestamp.
     *
     * @param bool $short
     *
     * @return \Carbon\Carbon
     */
    public function getFormattedUpdatedAt($short = false): string
    {
        $format = ($short) ? $this->shortTimestampFormat : $this->longTimestampFormat;

        return $this->getUpdatedAt()->format($format);
    }
}
