<?php

namespace Drupal\topic_blocks_deriver\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\block\Entity\Block;
use Drupal\Core\Config\FileStorage;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a 'TopicDeriverBlock' block.
 *
 * @Block(
 *  id = "topic_deriver_block",
 *  admin_label = @Translation("Topic Deriver Block"),
 *  deriver = "Drupal\topic_blocks_deriver\Plugin\Derivative\TopicDeriverBlock"
 * )
 */
class TopicDeriverBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $block_id = $this->getDerivativeId();
    //print_r($block_id);die;
/*  $config_path = drupal_get_path('module', 'topic_blocks_deriver') . '/config/install';
    $source = new FileStorage($config_path);
    $config_storage = \Drupal::service('config.storage');
    $block_config = 'block.block.test_block';
    $config_storage->write($block_config , $source->read($block_config));

    print_r($block_id);die;
    $block = Block::load($block_id);
    $block->setRegion('content');
    $block->save();*/
    //$build_array['#cache']['tags'][] = $term->getEntityTypeId() . ':' .$term->id();
    //print_r($block_id);die;
/*    $block = Block::load($block_id);
    $block->setRegion('content');
    $block->save();*/
// After clearing cache, block is seen in place block window.
// Block does not gets placed in content region using above commented code.
    return array(
      '#markup' => $block_id,
    );

  }

  /**
   * {@inheritdoc}
   */
  protected function blockAccess(AccountInterface $account) {
    $access = $account->isAuthenticated() ? AccessResult::allowed() : AccessResult::forbidden();
    return $access->addCacheTags(['taxonomy_term_list']);
  }

}
