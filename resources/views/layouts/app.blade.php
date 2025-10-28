<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="p-4 text-white mb-6" style="background-color: #dd99ff;">
        <div class="container mx-auto flex justify-between">
            <a href="{{ url('/') }}" class="font-bold text-lg">Library Monitoring System</a>
            <div>
                <a href="{{ url('/') }}" class="mr-4 hover:underline">Home</a>
                <a href="{{ route('books.index') }}" class="mr-4 hover:underline">Books</a>
                <a href="{{ route('students.index') }}" class="mr-4 hover:underline">Students</a>
                <a href="{{ route('transactions.index') }}" class="hover:underline">Transactions</a>
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
</body>
</html>