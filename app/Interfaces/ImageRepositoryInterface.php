<?php

namespace App\Interfaces;

interface ImageRepositoryInterface
{
    public static function moveImageFiles($assessmentId, $productId);
    public static function updateImageFiles($assessmentId, $productId);
}