<?php declare(strict_types=1);

namespace App\Logbook\Model;

use Doctrine\ORM\Mapping as ORM;
use App\Security\Model\User;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="logbook_log")
 */
class Log
{
    const PROJECT_LABELS = [
        null => 'Choisissez votre projet',
        'cv_portfolio' => '🎓 Portfolio',
        'plante_connectee' => '🌱 Plante connectée',
        'inventaire_plus' => '💾 Inventaire+',
    ];

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Security\Model\User", inversedBy="logbookLogs")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $project;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     */
    private $text;

    /**
     * @Assert\Image(maxSize = "2048k")
     */
    private $mediaFile;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $media;

    public function __construct(User $user)
    {
        $this->user = $user;

        $this->date = $date ?? new \DateTime;
    }

    public function setProject(string $project): void
    {
        $this->project = $project;
    }

    public function getProject(): ?string
    {
        return $this->project;
    }

    public function getProjectLabel(): string
    {
        return self::PROJECT_LABELS[$this->project];
    }

    public function setDate(\DateTime $date): void
    {
        $this->date = $date;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setMediaFile(UploadedFile $mediaFile)
    {
        $this->mediaFile = $mediaFile;
    }

    public function getMediaFile(): ?UploadedFile
    {
        return $this->mediaFile;
    }

    public function setMedia(string $media): void
    {
        $this->media = $media;
    }

    public function getMedia(): ?string
    {
        return $this->media;
    }
}
