<?php

function price_format($price)
{
    return number_format($price, 0, '', '.');
}
