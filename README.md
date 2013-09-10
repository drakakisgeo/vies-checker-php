Vies-checker-PHP Ver. 1.0
================
VIES Check Europe VAT id [PHP 5.4.*]
------------------------------------

Inspired by *webmastersdiary.com* that has a similar script. I had the need to check EU Vat IDS. Its not *perfect* but it gets the job done.

- Checks if the Vat ID is valid by checking the ec.europa.eu website
- Checks if the Country of the provided ID is the one you are searching. Here in Greece its common to charge VAT people/bussiness that are local.


*The most optimal solution would be to validate a few things before the soap request, but I haven't checked if there is some kind of **pattern** for EU Vat Ids. If there is such a thing (like countrycode(2Digits) + 9 numbers ) **feel free to fork and alter this script or let me know about it!.***

Have fun!

