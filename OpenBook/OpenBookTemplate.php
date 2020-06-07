 <?php
/**
 * BaseTemplate class for Foo Bar skin
 *
 * @ingroup Skins
 */
class OpenBookTemplate extends BaseTemplate {
	/**
	 * Outputs the entire contents of the page
	 */
	public function execute() {
		$this->html( 'headelement' );
		?>
			<div id="global-wrapper">
				<div id="topbar-wrapper">
					<div id="topbar">
						<div id="topbar-search-section">
							<form action="<?php $this->text( 'wgScript' ); ?>">
								<input type="hidden" name="title" value="<?php $this->text( 'searchtitle' ) ?>" />
								<?php echo $this->makeSearchInput( array( 'id' => 'searchInput' ) ); 
								echo $this->makeSearchButton( 'go', array( 'id' => 'searchGoButton', 'class' => 'searchButton' ) );
								echo $this->makeSearchButton( 'fulltext', array( 'id' => 'mw-searchButton', 'class' => 'searchButton' ) );
								?>
							</form>
						</div>
						<div id="topbar-personal-section">
							<ul>
							<?php
								foreach ( $this->getPersonalTools() as $key => $item ) {
									echo $this->makeListItem( $key, $item );
								}
							?>
							</ul>
						</div>
					</div>
				</div>
				<div id="sidebar-wrapper">
					<div id="logo-wrapper">
						<?php
						echo Html::element( 'a', array(
								'href' => $this->data['nav_urls']['mainpage']['href'],
								'class' => 'mw-wiki-logo',
								)
						); ?>
					</div>
					<div id="sidebar">
						<?php
						foreach ( $this->getSidebar() as $boxName => $box ) { ?>
							<div id="<?php echo Sanitizer::escapeId( $box['id'] ) ?>" class="sidebar-section" <?php echo Linker::tooltip( $box['id'] ) ?>>
								<h5><?php echo htmlspecialchars( $box['header'] ); ?></h5>
							<?php
								if ( is_array( $box['content'] ) ) { ?>
								<div class="sidebar-body">
									<ul>
								<?php
										foreach ( $box['content'] as $key => $item ) {
											echo $this->makeListItem( $key, $item );
										}
								?>
									</ul>
								</div>
							<?php
								} else {
									echo $box['content'];
								}
							?>
							</div>
						<?php } ?>
					</div>
				</div>
				<div id="content-wrapper">
					<div id="content-tabs">
						<ul>
							<?php
								foreach ( $this->data['content_actions'] as $key => $tab ) {
									echo $this->makeListItem( $key, $tab );
								}
							?>
						</ul>
					</div>
					<div id="content">
						<?php if ( $this->data['sitenotice'] ) { ?>
						  <div id="sitenotice">
							<?php $this->html( 'sitenotice' ); ?>
						  </div>
						<?php } ?>
						<?php if ( $this->data['newtalk'] ) { ?>
						  <div class="newmessage">
							<?php $this->html( 'newtalk' );?>
						  </div>
						<?php } ?>
						<h1 id="pagetitle"><?php $this->html( 'title' ); ?></h1>
						<span id="tagline"><?php $this->msg( 'tagline' ); ?></span>
						<div id="pagetext">
							<?php $this->html( 'bodytext' ) ?>
						</div>
						<?php $this->html( 'catlinks' ); ?>
						<?php $this->html( 'dataAfterContent' ); ?>
						<div class="visualClear"></div>
					</div>
				</div>
			</div>
			<div id="footer">
				<ul>
					<?php foreach ( $this->getFooterLinks( 'flat' ) as $key ) { ?>
						<li><?php $this->html( $key ) ?></li>
					<?php } ?>
					<?php
						foreach ( $this->getFooterIcons( 'icononly' ) as $blockName => $footerIcons ) { ?>
						<li>
					<?php
							foreach ( $footerIcons as $icon ) {
								echo $this->getSkin()->makeFooterIcon( $icon, 'withoutImage' );
							}
					?>
						</li>
					<?php
						} ?>
				</ul>
			</div>
				<?php
			}
		}
