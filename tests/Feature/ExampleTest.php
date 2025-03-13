<?php

it('returns a successful response', function () {
    $response = $this->get('/news');

    $response->assertStatus(200);
});
