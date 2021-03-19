<?php

namespace App\Http\Controllers\Home;

class HomeController
{
    public function get()
    {
?>
        <form method="POST">
            <button type="submit">Post method</button>
        </form>
<?php
    }

    public function post()
    {
        return "Post page";
    }
}
