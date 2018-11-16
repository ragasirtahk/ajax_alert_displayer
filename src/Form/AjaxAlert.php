<?php

namespace Drupal\ajax_alert_displayer\Form;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\AlertCommand;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * AJAX Alert Form.
 */
class AjaxAlert extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'ajax_alert_displayer';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['ajax_alert_displayer'] = [
      '#type' => 'button',
      '#value' => 'Display!',
      '#ajax' => [
        'callback' => '::alertCallback',
        'event' => 'click',
        'progress' => [
          'type' => 'throbber',
          'message' => NULL,
        ],
      ],
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
  }

  /**
   * {@inheritdoc}
   */
  public function alertCallback($form, $form_state) {

    $response = new AjaxResponse();
    $response->addCommand(new AlertCommand("This is a sample text."));
    return $response;
  }

}
