<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <style>
            table {
                Border: solid 1px;
                width: 100%;
            }
            th, td {
                text-align: center;
                justify-content: space-between;
            }
            td {
                padding: 10px;
            }
        </style>
    </head>
    <body>

        <div>
            <p>Served to you by: {{ $user }} <br> Row count: {{ $equipmentCount }} </p>
            <div>
                @if ($availability || $category || $price)
                    <p>Filters: </p>
                    @if ($availability)
                        Availability: {{ $availability == 'available' ? 'On Stock' : 'Out of Stock' }}<br>
                    @endif
                    @if ($category)
                        Category: {{ ucfirst($category) }}<br>
                    @endif
                    @if ($price)
                        Price: {{ $price =='asc' ? 'Ascending' : 'Descending' }}
                    @endif
                @endif
            </div>
            <br>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Equipment Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Availability</th>
                    <th>Time added</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($equipments as $equipment)
                    <tr>
                        <td> {{ $equipment -> id }}</td>
                        <td> {{ $equipment -> EquipmentName }}</td>
                        <td> {{ $equipment -> Category }}</td>
                        <td> {{ $equipment -> UnitPrice }}</td>
                        <td> {{ $equipment -> Description }}</td>
                        <td> {{ $equipment -> Availability ? 'On Stock' : 'Out of Stock' }}</td>
                        <td> {{ $equipment -> created_at }}</td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </body>
</html>