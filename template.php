<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/** @var array $arParams */
/** @var array $arResult */
$this->setFrameMode(true);

$this->addExternalCss($this->GetFolder().'/css/common.css');
?>

<div id="barba-wrapper">
    <div class="article-list">
        <?php foreach ($arResult["ITEMS"] as $arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            
            <a class="article-item article-list__item" href="<?= $arItem['DETAIL_PAGE_URL'] ?>" data-anim="anim-3" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <?php if ($arParams["DISPLAY_PICTURE"] != "N"): ?>
                    <div class="article-item__background">
                        <?php if (is_array($arItem["PREVIEW_PICTURE"])): ?>
                            <img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>" />
                        <?php else: ?>
                            <img src="<?= $this->GetFolder() ?>/images/article-item-bg-1.jpg" alt="<?= $arItem["NAME"] ?>" />
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                
                <div class="article-item__wrapper">
                    <?php if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]): ?>
                        <div class="article-item__title"><?= $arItem["NAME"] ?></div>
                    <?php endif; ?>
                    
                    <?php if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]): ?>
                        <div class="article-item__content"><?= $arItem["PREVIEW_TEXT"] ?></div>
                    <?php endif; ?>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<?php if (empty($arResult["ITEMS"])): ?>
    <p>Новостей не найдено.</p>
<?php endif; ?>