<div class="col-md-12">
    <div class="table-responsive">
      <table class="table table-bordered table-condensed table-responsive-md table-hover" style="height: 50px; overflow-y: scroll;">
        <thead class="text-center">
          <tr>
            <th>Fecha y Hora</th>
            <th>Cloro</th>
            <th>PH</th>
          </tr>
        </thead>
        <div class="overflow-auto">
          <tbody class="text-center my-tbody">
            @forelse ($mediciones as $md)
              @php
                // determinar el estado del cloro para aplicar un color a la fila
                $stdCloro = "";
                switch ($md->getEstadoCloro()) {
                    case '1':
                        $stdCloro = "table-danger";
                        break;
                    case '2':
                }
                // determinar el estado del cloro para aplicar un color a la fila
                $stdPh = "";
                switch ($md->getEstadoPh()) {
                    case '1':
                        $stdPh = "table-danger";
                        break;
                }
              @endphp
              <tr>
                  <td>{{$md->FECHA_Y_HORA}}</td>
                  <td class="{{$stdCloro}}">{{$md->CLORO}}</td>
                  <td class="{{$stdPh}}">{{$md->PH}}</td>
              </tr>
            @endforeach
          </tbody>      
        </div>
      </table>
    </div>
  </div>
</div>