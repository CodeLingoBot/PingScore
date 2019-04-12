<?php

include_once '../../includes/partials/header_panel.html';
include_once '../../includes/toasts.php';
?>

<div class="container" max-width=75%>
    <h3 class="text-center">
        Table 1 - 17:00
    </h3>
    <table class="table table-secondary">
        <!-- Affichage joueur bleu -->
        <td>
            <div class="card bg-primary mb-3">
                <img src="../../assets/img/players" class="card-img-top" width="320" height=320 alt="">
                <div class="card-body">

                    <h5 class="card-title">Hugo MARTI</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Cat. 1</li>
                    <li class="list-group-item">ASPCN</li>
                </ul>
            </div>
        </td>
        <!-- Fin affichage bleu -->

        <!-- Cadre centre -->
        <td>
            <table class="table table-warning table-bordered">
                <tbody>
                <tr>
                    <th scope="row" width=50%>MARTI</th>
                    <td width=10% class="text-muted">11</td>
                    <td width=10%>2</td>
                    <td width=10%>0</td>
                    <td width=10%>0</td>
                    <td width=10%>0</td>
                </tr>
                <tr>
                    <th scope="row" width=50%>NICOLAS</th>
                    <td width=10% class="text-muted">8</td>
                    <td width=10%>4</td>
                    <td width=10%>0</td>
                    <td width=10%>0</td>
                    <td width=10%>0</td>
                </tr>
                </tbody>
            </table>
            <table class="table table-borderless text-center">
                <tr>
                    <td width=50%>
                        <div type="button" class="card bg-dark btn btn-light disabled">
                            <h1 class="text-white">Service</h1>
                        </div>
                    </td>

                    <td width=50%>
                        <div type="button" class="card bg-dark btn btn-light">
                            <h1 class="text-white">Service</h1>
                        </div>
                    </td>
                <tr>
                <tr>
                    <td width=50%>
                        <div type="button" class="card bg-primary btn btn-light">
                            <h1>+</h1>
                        </div>
                    </td>
                    <td width=50%>
                        <div type="button" class="card bg-danger btn btn-light">
                            <h1>+</h1>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width=50%>
                        <div type="button" class="card bg-primary btn btn-light">
                            <h1>-</h1>
                        </div>
                    </td>
                    <td width=50%>
                        <div type="button" class="card bg-danger btn btn-light">
                            <h1>-</h1>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width=50%>
                        <div type="button" class="card bg-dark btn btn-light">
                            <h1 class="text-white">Set</h1>
                        </div>
                    </td>
                    <td width=50%>
                        <div type="button" class="card bg-success btn btn-light disabled">
                            <h1>Match</h1>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
        <!-- Fin cadre -->

        <!-- Affichage joueur rouge -->
        <td>
            <div class="card bg-danger mb-3">
                <img src="../../assets/img/players" class="card-img-top" width="320" height=320 alt="">
                <div class="card-body">
                    <h5 class="card-title">
                        Luc NICOLAS
                    </h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        Cat. 8
                    </li>
                    <li class="list-group-item">
                        ASPCN
                    </li>
                </ul>
            </div>
        </td>
        <!-- Fin affichage rouge -->
    </table>
</div>

<?php
include_once '../../includes/partials/footer_panel.html';
?>