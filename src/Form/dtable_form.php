<? php
public function buildForm(array $form, FormStateInterface $form_state) {
    // Form usage example.
    $form['example_table'] = [
      '#type' => 'table',
      '#theme' => 'datatable',
      '#header' => $header,
      '#empty' => $this->t('Some text'),
      '#rows' => $this->getTableRows($header),
      '#attributes' => [
        'class' => ['needed-class'],
        'datatable_options' => $this->getDataTableOptions(),
      ],
    ];
    //     ... another elements ...
    return $form;
  }

  // Datatable options example.
  public function getDataTablesOptions() {
    return [
      // Allow retrieve DataTable.
      'retrieve' => TRUE,
      'exposed_form' => TRUE,
      // State Save.
      'stateSave' => TRUE,
      // When set to true used data-drupal-selector (Useful for Ajax processed(replaced) tables).
      'stateAlternativeSave' => FALSE,
      // When set to -1 sessionStorage will be used, while for 0 or greater localStorage will be used.
      // The value 0 is a special value as it indicates that the state can be stored and retrieved
      // indefinitely with no time limit. Example (1 day):  'stateDuration' => 60 * 60 * 24
      'stateDuration' => 0,
      'deferRender' => FALSE,
      'processing' => TRUE,
      'filter' => FALSE,
      'info' => FALSE,
      'collapsedClass' => FALSE,
      'ordering' => TRUE,
      'lengthChange' => TRUE,
      'displayLength' => 10,
      'pageLength' => 10,
      'dom' => '<B<"datatables-header"ilf>rtp',
      'buttons' => [
        [
          'extend' => 'colvis',
          'collectionLayout' => 'fixed two-column',
          'text' => 'Show/Hide Columns',
        ],
        [
          'extend' => 'print',
          'text' => 'Print',
          'exportOptions' => [
            'modifier' => [
              'page' => 'current',
            ],
            'orientation' => 'landscape',
            'pageSize' => 'A4',
            'columns' => ':visible:not([aria-label="Operations"])',
          ],
        ],
        [
          'extend' => 'collection',
          'name' => 'primary',
          'collectionLayout' => 'fixed',
          'text' => 'Export',
          'className' => 'buttons-excel',
          'buttons' => [
            [
              'extend' => 'pdfHtml5',
              'text' => 'Export to PDF',
              'orientation' => 'landscape',
              'pageSize' => 'A4',
              'exportOptions' => [
                'modifier' => [
                  'page' => 'current',
                ],
                'columns' => ':visible:not([aria-label="Operations"])',
              ],
            ],
            [
              'extend' => 'excelHtml5',
              'text' => 'Export to Excel',
              'exportOptions' => [
                'modifier' => [
                  'page' => 'current',
                ],
                'columns' => ':visible:not([aria-label="Operations"])',
              ],
            ],
          ],
        ],
      ],
      'scrollY' => 480,
      'scrollX' => '100%',
      'scrollCollapse' => TRUE,
      'paging' => FALSE,
      'order' => [
        [0, 'asc'],
        [1, 'asc'],
        [2, 'asc'],
      ],
      'fixedColumns' => [
        'leftColumns' => 2,
        'heightMatch' => 'semiauto',
      ],
      // Disable autoWidth.
      'autoWidth' => FALSE,
      'language' => [
        'processing' => '<div class="your-class"><div class="your-progress-throbber"></div></div>',
        'decimal' => '.',
        'thousands' => ',',
        'paginate' => [
          'first' => '« First',
          'last' => 'Last »',
          'next' => '››',
          'previous' => '‹‹',
        ],
        'info' => 'Showing _START_-_END_ out of _TOTAL_',
      ],
      'lengthMenu' => [],
    ];
  }
