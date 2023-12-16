<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>cetek pdf</title>
  <link rel="stylesheet" href="{{ asset('assets/css/pdf.css') }}">
</head>

<body>
  <h3>Laporan kunjungan</h3>
  <div class="table-container">
    <table>
      <thead>
        <tr>
          <th>Judul Post</th>
          <th>Author</th>
          <th>Views</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($periodViews as $post)
          @if ($post->viewed_by_count > 0)
            <tr>
              <td>{{ $post->title }}</td>
              <td>{{ $post->user->name }}</td>
              <td>{{ $post->viewed_by_count }}</td>
            </tr>
          @endif
        @endforeach
        <tr>
          <td colspan="2">Total kunjungan</td>
          <td>{{ $total }}</td>
        </tr>
        <!-- Tambahkan baris-baris data lainnya -->
      </tbody>
    </table>
  </div>
</body>

</html>
