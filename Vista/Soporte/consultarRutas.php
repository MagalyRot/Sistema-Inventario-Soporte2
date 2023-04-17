<h1 class="app-page-title">Consultar rutas</h1>
  

<div class="row g-4 mb-4">
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Rutas de red</h4>
                <div class="stats-figure">237</div>
                <div class="stats-meta">Ver</div>
            </div>
            <a class="app-card-link-mask" onclick="loadFileSoporteRedes('rutaRed','loadPage')"></a>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Segmentos</h4>
                <div class="stats-figure">120</div>
                <div class="stats-meta">Ver</div>
            </div>
            <a class="app-card-link-mask" onclick="loadFileSoporteRedes('consultarSegmentos','loadPage')"></a>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">VLANS</h4>
                <div class="stats-figure">26</div>
                <div class="stats-meta">Ver</div>
            </div>
            <a class="app-card-link-mask" onclick="loadFileSoporteRedes('consultarVlans','loadPage')"></a>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Equipos de cómputo</h4>
                <div class="stats-figure">187</div>
                <div class="stats-meta">Ver</div>
            </div>
            <a class="app-card-link-mask" onclick="loadFileInventario('equipoCompu','loadPage')"></a>
        </div>
    </div>
</div>

<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">Rutas de red</h1>
    </div>
    <div class="col-auto">
        <div class="page-utilities">
            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                <div class="col-auto">
                    <form class="table-search-form row gx-1 align-items-center">
                        <div class="col-auto">
                            <input type="text" id="search-orders" name="searchorders" class="form-control search-orders"
                                placeholder="Search">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn app-btn-secondary">Buscar</button>
                        </div>
                    </form>
                </div>
                <div class="col-auto">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn app-btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Agregar artículo
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tabla-->
<div class="tab-content" id="orders-table-tab-content">
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="cell">Order</th>
                                <th class="cell">Product</th>
                                <th class="cell">Customer</th>
                                <th class="cell">Date</th>
                                <th class="cell">Status</th>
                                <th class="cell">Total</th>
                                <th class="cell"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="cell">#15346</td>
                                <td class="cell"><span class="truncate">Lorem ipsum dolor sit amet eget volutpaterat</span></td>
                                <td class="cell">John Sanders</td>
                                <td class="cell"><span>17 Oct</span><span class="note">2:16 PM</span></td>
                                <td class="cell"><span class="badge bg-success">Paid</span></td>
                                <td class="cell">$259.35</td>
                                <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
                            </tr>
                            <tr>
                                <td class="cell">#15345</td>
                                <td class="cell"><span class="truncate">Consectetur adipiscing elit</span></td>
                                <td class="cell">Dylan Ambrose</td>
                                <td class="cell"><span class="cell-data">16 Oct</span><span class="note">03:16 AM</span>
                                </td>
                                <td class="cell"><span class="badge bg-warning">Pending</span></td>
                                <td class="cell">$96.20</td>
                                <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <nav class="app-pagination">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>    
</div>