<?php

namespace Src\Helper\Documentation;

use Src\Helper\JsonReader;

class DocumentationHelper
{
    /** @var DocumentationSection[] */
    protected array $sections = [];

    protected static string $jsonUrl = "/public/data/doc-sections.json";

    public function __construct(
        protected JsonReader $jsonReader,
        protected DocumentationHydrator $documentationHydrator
    ) {
        $this->initSections();
    }

    protected function initSections(): void
    {
        $localPath = $_SERVER['DOCUMENT_ROOT'] . self::$jsonUrl;
        $jsonContent = $this->jsonReader->read($localPath);

        foreach($jsonContent as $elem) {
            $this->sections[] = $this->documentationHydrator->create($elem);
        }
    }

    public function getBySlug(string $slug): ?DocumentationSection
    {
        $found = null;

        foreach($this->sections as $section) {
            if($section->getSlug() === $slug) {
                $found = $section;
                break;
            }
        }

        return $found;
    }

    public function getSectionList()
    {
        return $this->sections;
    }

}