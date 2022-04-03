<section class="ftco-section bg-light">
    <div class="container">
        <h2 class="mt-n4 pb-3">My bookings</h2>
        <?php if ($bookings == null) : ?>
            <p class="text-center">No Bookings...</p>
        <?php else : ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Model</th>
                        <th scope="col">Number</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">No of Days</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $counter = 0;
                    foreach ($bookings as $booking) :
                        $counter++;
                    ?>
                        <tr>
                            <td><?= $counter ?></td>
                            <td><?= $booking['model'] ?></td>
                            <td><?= $booking['number'] ?></td>
                            <td><?= date('d-m-Y', strtotime($booking['start_date'])) ?></td>
                            <td><?= $booking['no_of_days'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</section>