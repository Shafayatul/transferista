<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <style type="text/css">
    @page {
            margin: 0px;
        }
        body {
            margin: 0px;
            margin: 15px;
            background: #FFFFFF; 
            font-family: Arial, sans-serif; 
           
          
  
        }   

 .clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}



header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background-color: #DBDBD9;
  
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  /*text-align: right;*/
}

#project div,
#company div {
  white-space: nowrap;        
}
.invoice table {
           
        }
table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <!-- <img src="logo.png"> -->
        <img src="{{ public_path('img/Transferista.jpg') }}" alt="dsjfhdskj">
      </div>
      <h1>INVOICE {{ $project->invoice->id }}</h1>
      <div id="company" class="clearfix">
        <div>{{ $company['company'] }}</div>
        <div>{{ $company['address']}},<br /> {{ $company['town']}}, {{ $company['country']}}</div>
        <div>{{ $company['phone']}}</div>
        <div><a href="mailto:{{ $company['email_company'] }}">{{ $company['email_company'] }}</a></div>
      </div>
      <div id="project">
        {{-- <div><span>PROJECT</span> {{ $project->project_title}}</div> --}}
        <div><span>CLIENT</span> {{ $transferista['name'] }}</div>
        <div><span>ADDRESS</span> {{ $transferista_info['address']}}, {{ $transferista['town']}} {{ $transferista['zip']}}, {{ $transferista['country']}}</div>
        <div><span>EMAIL</span> <a href="mailto:{{ $transferista['email_company']}}">{{ $transferista['email_company']}}</a></div>
        <div><span>DATE</span> {{ Carbon\Carbon::parse($project->invoice->created_at)->format('d-m-Y') }}</div>
        <div><span>Vat</span> {{ $transferista['vat']}}</div>
      </div>
    </header>
    <main class="invoice">
      <table>
        <thead>
          <tr>
            <th class="service">Title</th>
            <th class="desc">Description</th>
            <th>PRICE</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>

          <tr>
            <td class="service">{{ $project->project_title }}</td>
            <td class="desc">{{ $project->project_description }}</td>
            <td class="unit">${{ $project->project_amount }}</td>
            <td class="total">${{ $project->project_amount }}</td>
          </tr>
          <tr>
            <td colspan="3">SUBTOTAL</td>
            <td class="total">${{ $project->project_amount }}</td>
          </tr>
          {{-- <tr>
            <td colspan="4">TAX 25%</td>
            <td class="total">$1,300.00</td>
          </tr> --}}
          <tr>
            <td colspan="3" class="grand total">GRAND TOTAL</td>
            <td class="grand total">${{ $project->project_amount }}</td>
          </tr>
        </tbody>
      </table>
      {{-- <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div> --}}
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>