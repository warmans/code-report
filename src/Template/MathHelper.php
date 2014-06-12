<?php
namespace CodeReport\Template;

use Symfony\Component\Templating\Helper\Helper;

class MathHelper extends Helper
{
    public function getName()
    {
        return 'math';
    }

    public function pcnt($val, $total)
    {
        if ($total == 0) {
            return 0;
        }
        return number_format(($val / $total) * 100, 2);
    }
}
