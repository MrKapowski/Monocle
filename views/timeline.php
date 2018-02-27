<?php $this->layout('layout', ['title' => $channel['name']]) ?>

<style>
.timeline {
  max-width: 600px;
  margin-left: auto;
  margin-right: auto;
}
.entry {
  margin-bottom: 12px;
  border: 1px #E6E6E6 solid;
  border-radius: 4px;
  background: #fff;
  line-height: 1.4;
  word-wrap: break-word;
}
@media(max-width: 600px) {
  .timeline {
    width: 100%;
    max-width: 100%;
    margin-left: 0;
    margin-right: 0;
  }
  .container {
    margin: 0 6px;
  }
}

.entry .author {
  padding: 6px 8px 0 8px;
}
.entry .author img {
  width: 40px;
  border-radius: 20px;
  border: 1px #e6e6e6 solid;
  vertical-align: middle;
}
.entry .author a {
  text-decoration: none;
}
.entry .author img {
  margin-left: 6px;
}
.entry .author .author-name {
  font-size: 10pt;
  line-height: 1.2;
  display: inline-block;
  vertical-align: middle;
}
.entry .author .author-name .name {
  display: block;
  font-weight: bold;
}
.entry .author .author-name .url {
  display: block;
}

.entry > .name {
  padding: 0 8px;
  margin: 0;
  margin-top: 12px;
  font-size: 16pt;
}

.entry .content {
  padding: 8px;
}
.entry .content.text {
  white-space: pre-wrap;
}
.entry p:first-child {
  margin-top: 0;
}
.entry p:last-child {
  margin-bottom: 0;
}
.entry .content img {
  max-width: 100%;
}
.entry .content blockquote {
  border-left: 4px #e6e6e6 solid;
  margin-left: 20px;
  padding-left: 8px;
}

.entry audio {
  width: 100%;
}

.entry .photo {
  width: 100%;
  margin-bottom: 6px;
}

.entry .meta {
  padding: 0 8px 8px 8px;
  color: #aaa;
  font-size: 10pt;
}
.entry .meta a {
  color: #aaa;
  text-decoration: none;
}
</style>


<div class="timeline"><div class="container">

  <h2><?= $channel['name'] ?></h2>

<? foreach($entries as $entry): ?>
  <div class="entry">

    <div class="author">
      <? if(!empty($entry['author']['name']) && !empty($entry['author']['photo']) && !empty($entry['author']['url'])): ?>
        <img src="<?= e($entry['author']['photo']) ?>">
        <div class="author-name">
          <a href="<?= e($entry['author']['url']) ?>" class="name"><?= e($entry['author']['name']) ?></a>
          <a href="<?= e($entry['author']['url']) ?>" class="url"><?= e(\p3k\url\display_url($entry['author']['url'])) ?></a>
        </div>
      <? elseif(!empty($entry['author']['url'])): ?>
        <div class="author-name">
          <a href="<?= e($entry['author']['url']) ?>" class="name"><?= e($entry['author']['name']) ?></a>
          <a href="<?= e($entry['author']['url']) ?>" class="url"><?= e(\p3k\url\display_url($entry['author']['url'])) ?></a>
        </div>
      <? else: ?>

      <? endif ?>
    </div>

    <? if(!empty($entry['name'])): ?>
      <h2 class="name"><?= e($entry['name']) ?></h2>
    <? endif ?>

    <? if(!empty($entry['content']['html'])): ?>
      <div class="content html"><?= $entry['content']['html'] ?></div>
    <? elseif(!empty($entry['content']['text'])): ?>
      <div class="content text"><?= e($entry['content']['text']) ?></div>
    <? endif ?>

    <? if(!empty($entry['audio'])): ?>
      <? foreach($entry['audio'] as $audio): ?>
        <audio src="<?= e($audio) ?>" controls>
      <? endforeach ?>
    <? endif ?>

    <? if(isset($entry['photo'])): ?>
      <div class="photos">
        <? foreach($entry['photo'] as $photo): ?>
          <img src="<?= $photo ?>" class="photo">
        <? endforeach ?>
        <div class="photoclear"></div>
      </div>
    <? endif ?>

    <div class="meta">
      <? if(!empty($entry['published'])): ?>
        <a href="<?= e($entry['url']) ?>">
          <?= display_date('F j, Y g:ia P', $entry['published']) ?>
        </a>
      <? else: ?>

      <? endif ?>
    </div>

    <div class="actions">

    </div>
  </div>
<? endforeach ?>

</div></div>

<!--
<pre>
<?php
print_r($entries);
?>
</pre>
-->