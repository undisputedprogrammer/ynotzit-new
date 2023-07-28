<?php
namespace Ynotz\MediaManager\Contracts;

use Illuminate\Support\Collection;
use PhpParser\ErrorHandler\Collecting;
use Ynotz\MediaManager\Models\MediaItem;

interface MediaOwner
{
    public function attachMedia(
        MediaItem $mediaItem,
        string $property,
        array $customProps = []
    ): void;

    public function addMediaFromEAInput(
        string $property,
        array|string $vals
    ): void;

    public function addOneMediaFromEAInput(string $property, string $input): void;

    public function deleteAllMedia(string $property): void;

    public function getMediaVariants(): array;

    public function getMediaStorage(): array;

    public function getAllMedia(string $property): Collection;

    public function getSingleMedia(string $property): MediaItem|null;

    public function getSingleMediaPath(string $property): string|null;

    public function getSingleMediaName(string $property): string|null;
}
?>
