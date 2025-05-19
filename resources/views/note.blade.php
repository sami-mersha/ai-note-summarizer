<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Note Summarizer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container py-5">
    <h2 class="mb-4">AI Note Summarizer</h2>

    <form method="POST" action="{{ route('summarize') }}">
        @csrf
        <div class="mb-3">
            <textarea name="note" rows="8" class="form-control" placeholder="Paste your note here...">{{ old('note', $text ?? '') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Summarize</button>
    </form>

    @if (isset($summary))
        <div class="mt-4">
            <h4>Summary:</h4>
            <div class="alert alert-success">{{ $summary }}</div>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger mt-3">{{ $errors->first() }}</div>
    @endif
</body>

</html>
