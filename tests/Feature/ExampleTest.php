<?php

test('the application returns a successful response for home and jobs', function () {
    $this->get('/')->assertStatus(200);
    $this->get('/jobs')->assertStatus(200);
});

test('unauthenticated users are redirected to named login route', function () {
    $this->get('/jobs/create')->assertRedirect(route('login'));
});
