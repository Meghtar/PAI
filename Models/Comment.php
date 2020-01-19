<?php

class Comment {
    private $id;
    private $post_id;
    private $user_id;
    private $content;
    private $datetime;

    public function __construct(
        int $id,
        int $post_id,
        int $user_id,
        string $content,
        string $datetime
    ) {
        $this->id = $id;
        $this->post_id = $post_id;
        $this->user_id = $user_id;
        $this->content = $content;
        $this->datetime = $datetime;
    }
}

?>