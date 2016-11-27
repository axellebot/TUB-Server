<?php

namespace BourgMapper\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BourgMapperUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}