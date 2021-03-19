<?php


namespace App\Services;


use App\Models\Purchase;
use Illuminate\Database\Eloquent\Model;
use Konekt\PdfInvoice\InvoicePrinter;

class InvoicingService
{
        protected $purchase, $quote;
        protected Object $config;

        public function __construct(Purchase $purchase)
        {
            $this->purchase = $purchase;
            $this->config = (object) config('kerp');
        }

        public function getPurchaseRequestPDF()
        {

            $invoice = new InvoicePrinter('A4', $this->config->currency, 'en');
            $invoice->setNumberFormat('.', ',', 'right', true, true);
            /* Header settings */
            $invoice->setLogo($this->config->logo_path);   //logo image path
            $invoice->setColor("#6ab04c");

            $invoice->setType("Demande d'achat");    // Invoice Type
            $invoice->setReference($this->purchase->reference);   // Reference
            $invoice->setTo(array($this->config->company_name,"Membre du group CEMOS PLC","Hay Jedid, Rue Principale", "Demandeur: ".$this->purchase->user->name . " - " .$this->purchase->service->name ));
            $this->purchase->buyables->map(function($item) use ($invoice){
                $invoice->addItem($item->model->name, $item->model->code, $item->pivot->quantity_ordered, 'NA', null, 'NA', 0);
            });
            $invoice->addBadge("consultation fournisseur", '#d63031');

            if($this->purchase->supplier_note){
                $invoice->addTitle("Note Importante");
                $invoice->addParagraph($this->purchase->supplier_note);
            }

            $invoice->setFooternote('CEMOS CIMENT S. A. au capital de 50 000 000 DH');
            $invoice->render('invoice.pdf','I');

        }

        public function getPurchaseOrderPDF()
        {

            $invoice = new InvoicePrinter('A4', 'MAD', 'en');
            $invoice->setNumberFormat('.', ',', 'right', true, true);
            /* Header settings */
            $invoice->setLogo($this->config->logo_path);   //logo image path
            $invoice->setColor("#6ab04c");

            $invoice->setType("Bon de commande");    // Invoice Type
            $invoice->setReference($this->purchase->reference);   // Reference
            $invoice->setTo(array($this->config->company_name,"Membre du group CEMOS PLC","Hay Jedid, Rue Principale","S/N TARFAYA , 0528 980 437"));
            $invoice->setFrom(array($this->purchase->supplier->name,$this->purchase->supplier->contact_email, $this->purchase->supplier->address, $this->purchase->supplier->contact_phone));
            $this->purchase->buyables->map(function($item) use ($invoice){
                $invoice->addItem($item->model->name, $item->model->code, $item->pivot->quantity_ordered, 0, $item->pivot->unit_price_in_cents / 100, 0, $item->pivot->quantity_ordered * ($item->pivot->unit_price_in_cents / 100));
            });
            $invoice->addBadge("bon de commande", '#4834d4');

            if($this->purchase->supplier_note){
                $invoice->addTitle("Note Importante");
                $invoice->addParagraph($this->purchase->supplier_note);
            }

            $invoice->addTotal("Sous-total",$this->purchase->subtotal_in_cents / 100);
            if($this->purchase->tax_total_in_cents > 0){
                $invoice->addTotal("VAT 20%",$this->purchase->tax_total_in_cents / 100);
            }
            if($this->purchase->transportation_fees_in_cents > 0){
                $invoice->addTotal("Transport",$this->purchase->transportation_fees_in_cents / 100);
            }
            if($this->purchase->importation_fees_in_cents > 0){
                $invoice->addTotal("Douanes",$this->purchase->importation_fees_in_cents / 100);
            }
            if($this->purchase->discounted_amount_in_cents > 0){
                $invoice->addTotal("Remises",-$this->purchase->discounted_amount_in_cents / 100);
            }
            $invoice->addTotal("Total due",$this->purchase->total_amount_in_cents /100,true);

            $invoice->render('invoice.pdf','I');
        }
}
