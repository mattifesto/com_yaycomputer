<?php

final class YCModels {
    const CBThemeIDForYCPageFooterViewContainer = '861c057665be9a23f73a8380110e7fa2906ee075';
    const CBThemeIDForYCPageFooterViewCopyright = '058105fc195c69cd6c52fb1b878c908f38c5fc9f';

    /**
     * @return null
     */
    public static function install() {
        include __DIR__ . '/YCModelsInstall.php';
    }
}
