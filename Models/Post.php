<?php

class Post {
    private $id;
    private $title;
    private $localization;
    private $city;
    private $likes;
    private $dislikes;
    private $picture;
    private $shares;
    private $content_amount;
    private $datetime;

    //arrays
    private $comments;

    public function __construct(
        int $id,
        string $title,
        int $localization,
        int $city,
        int $likes,
        int $dislikes,
        int $shares,
        string $content,
        string $datetime,
        string $comments_amount,
        $picture
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->localization = $localization;
        $this->city = $city;
        $this->likes = $likes;
        $this->dislikes = $dislikes;
        $this->picture = $picture;
        $this->shares = $shares;
        $this->content = $content;
        $this->datetime = $datetime;
        $this->comments_amount = $comments_amount;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getLocalization(): int
    {
        return $this->localization;
    }

    public function getCity(): int
    {
        return $this->city;
    }

    public function getLikes(): int
    {
        return $this->likes;
    }

    public function getDislikes(): int
    {
        return $this->dislikes;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function getShares(): int
    {
        return $this->shares;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getCommentsAmount(): int
    {
        return $this->comments_amount;
    }

    public function getDateTime(): string // probably some kind of DateTime later
    {
        return $this->datetime;
    }
}
?>