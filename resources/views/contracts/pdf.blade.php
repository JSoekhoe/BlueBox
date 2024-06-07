<!DOCTYPE html>
<html>
<head>
    <title>Contract PDF</title>
</head>
<body>
<h1>Contract Details</h1>
<p>Area: {{ $contract->area }}</p>
<p>End Date: {{ $contract->end_date }}</p>
<p>Payment Terms: {{ $contract->payment_terms }}</p>
<p>Rebate: {{ $contract->rebate }}</p>
<p>Rebate Period: {{ $contract->rebate_period }}</p>
<p>Paper Review: {{ $contract->paper_review }}</p>
<p>Review Period: {{ $contract->review_period }}</p>
<p>Review Base: {{ $contract->review_base }}</p>
<p>CTO Type: {{ $contract->cto_type }}</p>
<p>CTO Value: {{ $contract->cto_value }}</p>
<p>SOB: {{ $contract->sob }}</p>
<p>SOB Value: {{ $contract->sob_value }}</p>
</body>
</html>
