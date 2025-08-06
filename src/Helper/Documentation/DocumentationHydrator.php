<?php

namespace Src\Helper\Documentation;

use Dotenv\Exception\InvalidFileException;
use DumpsterfirePages\Container\Container;

class DocumentationHydrator
{
    protected array $requiredFields = [
        "name",
        "slug",
        "content"
    ];

    public function __construct(protected Container $container)
    {
    }

    public function create(array $data = [], int $layer = 1): DocumentationSection
    {
        $this->validate($data);

        $object = $this->container->create(DocumentationSection::class);

        $object
            ->setName($data['name'])
            ->setContent($data['content'])
            ->setSlug($data['slug'])
            ->addSubsections(...$this->buildSubsections($data, $layer + 1))
        ;

        return $object;
    }

    protected function buildSubsections(array $data, int $layer): array
    {
        if($layer > 2) {
            return [];
        }

        $subsections = [];

        if (empty($data['subsections'])) {
            $data['subsections'] = [];
        }

        foreach ($data['subsections'] as $subsection) {
            $subsections[] = $this->create($subsection, $layer);
        }

        return $subsections;
    }

    protected function validate(array $data): void
    {
        foreach ($this->requiredFields as $field) {
            if (!array_key_exists($field, $data)) {
                throw new InvalidFileException("Bad content: missing field $field in one of the sections.");
            }
        }
    }
}