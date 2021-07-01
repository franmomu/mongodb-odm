<?php

declare(strict_types=1);

namespace Documents\Functional;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

use function uniqid;

/** @ODM\EmbeddedDocument */
class VirtualHostDirective
{
    /** @ODM\Field(type="string") */
    protected $recId;
    /** @ODM\Field(type="string") */
    protected $name;
    /** @ODM\Field(type="string") */
    protected $value;
    /** @ODM\EmbedMany(targetDocument=Documents\Functional\VirtualHostDirective::class) */
    protected $directives;

    public function __construct($name = '', $value = '')
    {
        $this->name  = $name;
        $this->value = $value;
    }

    public function __toString()
    {
        return $this->name . ' ' . $this->value;
    }

    public function getRecId()
    {
        return $this->recId;
    }

    public function setRecId($value = null): void
    {
        if (! $value) {
            $value = uniqid();
        }

        $this->recId = $value;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($value): void
    {
        $this->name = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value): void
    {
        $this->value = $value;
    }

    public function getDirectives(): Collection
    {
        if (! $this->directives) {
            $this->directives = new ArrayCollection([]);
        }

        return $this->directives;
    }

    public function setDirectives($value): VirtualHostDirective
    {
        $this->directives = $value;

        return $this;
    }

    public function addDirective(VirtualHostDirective $d): VirtualHostDirective
    {
        $this->getDirectives()->add($d);

        return $this;
    }

    public function hasDirective(string $name): ?VirtualHostDirective
    {
        foreach ($this->getDirectives() as $d) {
            if ($d->getName() === $name) {
                return $d;
            }
        }

        return null;
    }

    public function getDirective($name): ?VirtualHostDirective
    {
        return $this->hasDirective($name);
    }

    public function removeDirective(VirtualHostDirective $d): VirtualHostDirective
    {
        $this->getDirectives()->removeElement($d);

        return $this;
    }
}
