<?php



Route::prefix('accounts')->group(function () {

    Route::get('accounting-dashboard', 'Admin\Accounting\AccountingController@dashboard')->name('accounting.dashboard');

    Route::get('new-lease-contract', 'Admin\Accounting\AccountingController@new_lease_contracts')->name('contracts.lease.new');
    //// Voucher
    Route::get('new-cash-receipt', 'Admin\Accounting\AccountingController@receipt_cash_new')->name('new.receipt.cash');
    Route::post('new-cash-voucher-create', 'Admin\Accounting\VoucherController@store_new_cash_voucher')->name('new.cash.voucher.store');
    Route::get('new-cheque-receipt', 'Admin\Accounting\AccountingController@receipt_cheque_new')->name('new.receipt.cheque');
    Route::post('new-cheque-voucher-create', 'Admin\Accounting\VoucherController@store_new_cheque_voucher')->name('new.cheque.voucher.store');
    Route::get('view-receipt-voucher/{id}', 'Admin\Accounting\AccountingController@view_receipt_voucher')->name('view.receipt.voucher');
    Route::get('all-receipt', 'Admin\Accounting\AccountingController@all_receipt_voucher')->name('all.receipt');
    Route::post('all-receipt-dt', 'Admin\Accounting\VoucherController@fetch_all_receipt_voucher')->name('all.receipt.dt');

    Route::get('new-cash-payment', 'Admin\Accounting\AccountingController@payment_cash_new')->name('new.payment.cash');
    Route::get('new-cheque-payment', 'Admin\Accounting\AccountingController@payment_cheque_new')->name('new.payment.cheque');
    Route::get('all-payment-voucher', 'Admin\Accounting\AccountingController@all_payment_voucher')->name('all.payment.voucher');
    Route::post('cash-payment-voucher-insert', 'Admin\Accounting\VoucherController@store_new_cash_payment_voucher')->name('cash.payment.voucher.store');
    Route::post('all-payment-vouchers-dt', 'Admin\Accounting\VoucherController@fetch_all_payment_vouchers')->name('all.payment.voucher.dt');


    Route::get('chart-of-accounts', 'Admin\Accounting\AccountingController@chart_of_acccoutns')->name('acc.chart.of.accounts');
    Route::post('fetch-chart-of-dt', 'Admin\Accounting\CoaController@datatable_coa')->name('chart.of.accounts.dt');
    Route::post('store-chart-of-acc', 'Admin\Accounting\CoaController@store_new_account')->name('chart.of.accounts.store');
    Route::post('get-coa-by-cat', 'Admin\Accounting\CoaController@get_account_by_category')->name('get.coa.by.category');

    Route::get('bank-accounts', 'Admin\Accounting\AccountingController@bank_accounts')->name('acc.bank.accounts');

    Route::get('bank-accounts-system-transactions/{account}', 'Admin\Accounting\AccountingController@bank_trans')->name('acc.bank.tans');

    Route::post('create-accounts', 'Admin\Accounting\BankAccController@store_bank_account')->name('acc.bank.store');

    Route::post('datatable-accounts', 'Admin\Accounting\BankAccController@datatable_bank_account')->name('acc.bank.datatable');

    Route::post('fetch-bank-acc-trans', 'Admin\Accounting\BankAccController@bank_account_transactions')->name('acc.bank.tansactions');

    Route::get('bank-transaction-reconcile/{account}', 'Admin\Accounting\BankAccController@reconcile')->name('acc.bank.reconcile');

    Route::post('bank-acc-trans-for-rec', 'Admin\Accounting\BankAccController@bank_account_transactions_dt')->name('acc.bank.tansactions.dt');

    Route::post('bank-statement-fetch-td', 'Admin\Accounting\BankAccController@bank_statement_dt')->name('acc.bank.statement.dt');

    Route::post('store-reconciled-data', 'Admin\Accounting\BankAccController@store_reconciled')->name('store.reconciled.trans');



    Route::get('bills', 'Admin\Accounting\AccountingController@bills')->name('acc.bills');

    Route::post('all-bill-fetch', 'Admin\Accounting\BillController@fetch_all_Bills')->name('all.bills.fetch');

    Route::get('bill-from-task/{id}', 'Admin\Accounting\BillController@task_to_bill')->name('task.bill.create');

    Route::post('bill-task-store', 'Admin\Accounting\BillController@store_task_bill')->name('task.bill.store');







    Route::get('invoices', 'Admin\Accounting\AccountingController@invoices')->name('acc.invoices');

    Route::get('invoice-create', 'Admin\Accounting\InvoiceController@invoice_create')->name('acc.invoice.create');

    Route::get('invoice-view-pay/{invoice}', 'Admin\Accounting\InvoiceController@view_invoice')->name('acc.invoice.view');

    Route::get('rent-invoice-generate/{id}', 'Admin\Accounting\InvoiceController@rent_invoice_create')->name('rent.invoice.create');

    Route::get('invoice-from-task/{id}', 'Admin\Accounting\InvoiceController@task_invoice_create')->name('task.invoice.create');

    Route::post('invoice-new-store', 'Admin\Accounting\InvoiceController@store_new_invoice')->name('invoice.create.post');



    Route::post('rent-invoice-store', 'Admin\Accounting\InvoiceController@store_rent_invoice')->name('store.rent.invoice');

    Route::post('task-invoice-store', 'Admin\Accounting\InvoiceController@store_task_invoice')->name('store.task.invoice');

    Route::post('all-invoice-fetch', 'Admin\Accounting\InvoiceController@fetch_all_invoice')->name('all.invoice.fetch');

    Route::post('store-invoice-payment', 'Admin\Accounting\InvoiceController@store_inovice_payment')->name('store.invoice.payment');

    Route::post('store-new-invoice', 'Admin\Accounting\InvoiceController@store_inovice_payment')->name('store.invoice.payment');





    Route::post('select2-get-item', 'Admin\AjaxController@select2_get_items')->name('fetch.items.select2');

    Route::post('insert-new-item', 'Admin\AjaxController@store_items')->name('store.items');



});

