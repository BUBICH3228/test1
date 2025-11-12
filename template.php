<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$this->addExternalCss($this->GetFolder() . '/commonsss');

?>
<div class="contact-form">
    <div class="contact-form__head">
        <div class="contact-form__head-title">Связаться</div>
        <div class="contact-form__head-text">
            Наши сотрудники помогут выполнить подбор услуги и&nbsp;расчет цены с&nbsp;учетом ваших требований
        </div>
    </div>
    <form class="contact-form__form" name="<?= $arResult['WEB_FORM_NAME'] ?>" action="<?= $arResult['FORM_ACTION'] ?>" method="POST" enctype="multipart/form-data">
        <?= $arResult['sessid'] ?>
        <input type="hidden" name="WEB_FORM_ID" value="<?= $arResult['WEB_FORM_ID'] ?>">
        
        <?php if ($arResult['isFormErrors'] === 'Y'): ?>
            <div class="alert"><?= $arResult['FORM_ERRORS_TEXT'] ?></div>
        <?php endif; ?>
        
        <?php if ($arResult['isFormNote'] === 'Y'): ?>
            <div class="success"><?= $arResult['FORM_NOTE'] ?></div>
        <?php endif; ?>
        
        <?php if ($arResult['isFormFields'] === 'Y'): ?>
        <div class="contact-form__form-inputs">
            <?php foreach ($arResult['QUESTIONS'] as $FIELD_SID => $question): ?>
                <?php if ($FIELD_SID === 'NAME'): ?>
                <div class="input contact-form__input">
                    <label class="input__label">
                        <div class="input__label-text">Ваше имя*</div>
                        <?= $question['HTML_CODE'] ?>
                        <div class="input__notification">Поле должно содержать не менее 3-х символов</div>
                    </label>
                </div>
                <?php elseif ($FIELD_SID === 'COMPANY'): ?>
                <div class="input contact-form__input">
                    <label class="input__label">
                        <div class="input__label-text">Компания/Должность*</div>
                        <?= $question['HTML_CODE'] ?>
                        <div class="input__notification">Поле должно содержать не менее 3-х символов</div>
                    </label>
                </div>
                <?php elseif ($FIELD_SID === 'EMAIL'): ?>
                <div class="input contact-form__input">
                    <label class="input__label">
                        <div class="input__label-text">Email*</div>
                        <?= $question['HTML_CODE'] ?>
                        <div class="input__notification">Неверный формат почты</div>
                    </label>
                </div>
                <?php elseif ($FIELD_SID === 'PHONE'): ?>
                <div class="input contact-form__input">
                    <label class="input__label" for="medicine_phone">
                        <div class="input__label-text">Номер телефона*</div>
                        <input 
                            class="input__input" 
                            type="tel" 
                            id="medicine_phone"
                            name="<?= $question['FIELD_NAME'] ?>"
                            data-inputmask="'mask': '+79999999999', 'clearIncomplete': 'true'" 
                            maxlength="12"
                            x-autocompletetype="phone-full" 
                            value="<?= $question['VALUE'] ?>" 
                            required
                        >
                    </label>
                </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        
        <?php if (isset($arResult['QUESTIONS']['MESSAGE'])): ?>
        <div class="contact-form__form-message">
            <div class="input">
                <label class="input__label">
                    <div class="input__label-text">Сообщение</div>
                    <?= $arResult['QUESTIONS']['MESSAGE']['HTML_CODE'] ?>
                    <div class="input__notification"></div>
                </label>
            </div>
        </div>
        <?php endif; ?>
        
        <div class="contact-form__bottom">
            <div class="contact-form__bottom-policy">
                Нажимая &laquo;Отправить&raquo;, Вы&nbsp;подтверждаете, что ознакомлены, полностью согласны и&nbsp;принимаете условия &laquo;Согласия на&nbsp;обработку персональных данных&raquo;.
            </div>
            <input 
                type="submit" 
                name="web_form_submit" 
                value="<?= strlen($arResult['arForm']['BUTTON']) > 0 ? $arResult['arForm']['BUTTON'] : 'Оставить заявку' ?>" 
                class="form-button contact-form__bottom-button"
            />
            <input type="hidden" name="web_form_apply" value="Y">
        </div>
        <?php endif; ?>
    </form>
</div>