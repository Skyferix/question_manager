<?php

namespace App\Entity;

use App\Repository\QuestionBankRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: QuestionBankRepository::class), UniqueEntity('title')]
class QuestionBank
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255, unique: true)]
    #[Assert\NotBlank]
    #[Assert\NotNull]

    private string $title;

    #[ORM\ManyToMany(targetEntity: Question::class, inversedBy: 'questionBanks')]
    private Collection $questions;

    #[ORM\Column(type: 'string', length: 1000)]
    #[Assert\NotBlank]
    #[Assert\NotNull]
    private string $description;

    #[Pure] public function __construct(string $title, string $description)
    {
        $this->questions = new ArrayCollection();
        $this->title = $title;
        $this->description = $description;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection<int, Question>
     */
    public function getQuestions(): Collection
    {
        return $this->questions;
    }

    public function addQuestion(Question $question): self
    {
        if (!$this->questions->contains($question)) {
            $this->questions[] = $question;
        }

        return $this;
    }

    public function removeQuestion(Question $question): self
    {
        $this->questions->removeElement($question);

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
