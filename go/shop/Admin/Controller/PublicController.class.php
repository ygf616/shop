<?php

namespace Admin\Controller;

class PublicController extends AdminController {
    
    Public function verify() {
        import('ORG.Util.Image');
        Image::buildImageVerify();
    }
}
