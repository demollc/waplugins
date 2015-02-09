<?php

class shopPersistentcartPlugin extends shopPlugin
{
    private function cartSync($contact = null)
    {
        if (!$this->getSettings('enabled')) {
            return null;
        }
        if (!$contact) {
            $id = wa()->getUser()->getId();
        } else {
            $id = $contact->getId;
        }
        $cart = waRequest::cookie('shop_cart');
        $model = new shopCartItemsModel;
        $carts = $model->query('SELECT code FROM shop_cart_items WHERE contact_id='.$id)->fetchAssoc();
        if (count($carts)==0) {
            return null;
        }
        $values = array('contact_id' => $id);
        if (count($carts)==1) {
            if ($cart != $carts['code']) {
                $data = array('code' => $cart);
                $model->updateByField($data, $values);
                $data = array('code' => $carts['code']);
                $model->updateByField($values, $data);
                $model->updateByField($data, $values);
                wa()->getResponse()->setCookie('shop_cart', $carts['code'], time() + 30 * 86400, null, '', false, true);
                return true;
            }
        }
    }
    
    public function cartAdd()
    {
        if (!wa()->getUser()->isAuth()) {
            return null;
        } else {
            $this->cartSync();
        }
    }
    
    public function frontendCart()
    {
        if (!wa()->getUser()->isAuth()) {
            return null;
        }
        if ($this->cartSync()) {
            return '<script>location.reload();</script>';
        }
    }
}
