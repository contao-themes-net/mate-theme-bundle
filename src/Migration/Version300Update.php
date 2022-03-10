<?php

declare(strict_types=1);

/*
 * mate theme for Contao Open Source CMS
 *
 * Copyright (C) 2022 pdir / digital agentur <develop@pdir.de>
 *
 * @package    contao-themes-net/mate-theme-bundle
 * @link       https://github.com/contao-themes-net/mate-theme-bundle
 * @license    pdir contao theme licence
 * @author     Mathias Arzberger <develop@pdir.de>
 * @author     Philipp Seibt <develop@pdir.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ContaoThemesNet\MateThemeBundle\Migration;

use Contao\ContentModel;
use Contao\CoreBundle\Migration\AbstractMigration;
use Contao\CoreBundle\Migration\MigrationResult;
use Contao\StringUtil;
use Doctrine\DBAL\Connection;

/**
 * @internal
 */
class Version300Update extends AbstractMigration
{
    /**
     * @var Connection
     */
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function shouldRun(): bool
    {
        $schemaManager = $this->connection->getSchemaManager();

        // If the database table itself does not exist we should do nothing
        if (!$schemaManager->tablesExist(['tl_content'])) {
            return false;
        }

        $oldGrids = $this->connection->query("SELECT type FROM tl_content WHERE type = 'bs_gridStart';");

        return $oldGrids->rowCount() > 0;
    }

    public function run(): MigrationResult
    {
        // update start element
        $this->connection->executeQuery("
            UPDATE
                tl_content
            SET
                type = 'ct_wrapperStart'
            WHERE
                type = 'bs_gridStart';
        ");

        // update stop element
        $this->connection->executeQuery("
            UPDATE
                tl_content
            SET
                type = 'ct_wrapperStop'
            WHERE
                type = 'bs_gridStop';
        ");

        // add css class row
        $contentModel = ContentModel::findBy('bs_grid', 1);

        $rowCount = 0;

        if ($contentModel) {
            foreach ($contentModel as $content) {
                $cssID = StringUtil::deserialize($content->cssID, true);
                // check for existing classes
                if ('' === $cssID[1]) {
                    $cssID[1] = 'row';
                } else {
                    $cssID[1] .= ' row';
                }

                $content->cssID = serialize($cssID);
                $content->save();

                ++$rowCount;
            }
        }

        return $this->createResult(
            true,
            'Change grid to wrapper elements and added css class row to '.$rowCount.' elements.'
        );
    }
}
