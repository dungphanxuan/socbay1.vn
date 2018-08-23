<?php

/* @var $this \yii\web\View */

use yii\helpers\Url;

echo '<?xml version="1.0"?>';
?>
<OpenSearchDescription xmlns="http://a9.com/-/spec/opensearch/1.1/">
    <ShortName>Ads Site Search</ShortName>
    <Description>Search the whole Ads site.</Description>
    <Image width="16" height="16" type="image/x-icon"><?php echo Url::to('@web/favico/favicon.ico', true) ?></Image>
    <Url type="text/html" method="get"
         template="<?php echo Url::toRoute(['search/global', 'q' => ''], true) ?>{searchTerms}"/>
    <Url type="application/x-suggestions+json"
         template="<?php echo Url::toRoute(['search/opensearch-suggest', 'q' => ''], true) ?>{searchTerms}"/>
</OpenSearchDescription>
