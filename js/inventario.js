      // Conectar ao primeiro banco de dados
      const mysql = require('mysql');
      const conn1 = mysql.createConnection({
        host: '172.10.20.47',
        user: 'archer',
        password: 'B5n3Qz2vL7HAUs7z',
        database: 'archerx'
      });

      // Conectar ao segundo banco de dados
      const conn2 = mysql.createConnection({
        host: '172.10.20.53',
        user: 'andre',
        password: 'somores013',
        database: 'ocsweb'
      });

      // Primeira consulta SQL para obter informações do primeiro banco de dados
      const sql1 = "SELECT name, bios.ssn, userid, workgroup, processort, memory, ipaddr, drives.total, drives.free, (drives.free / drives.total) * 100 AS percent_free FROM hardware JOIN bios ON hardware.id = bios.hardware_id JOIN drives ON hardware.id = drives.hardware_id JOIN accountinfo ON hardware.id = accountinfo.hardware_id WHERE accountinfo.fields_3 = 'xaxim' AND drives.total <> 0 ORDER BY percent_free <= 15 DESC";

      // Segunda consulta SQL para obter informações do segundo banco de dados
      const sql2 = "SELECT hosts.hostname, baia.baia FROM acs_uni INNER JOIN hosts ON acs_uni.id_hostname = hosts.id INNER JOIN baia ON acs_uni.id_baia = baia.id";

      // Executar a primeira consulta no primeiro banco de dados  
      conn1.query(sql1, (err1, result1) => {
        if (err1) throw err1;

        // Executar a segunda consulta no segundo banco de dados  
        conn2.query(sql2, (err2, result2) => {
          if (err2) throw err2;

          // Criar um objeto para armazenar os valores da coluna baia com base nos valores da coluna hostname
          const baias = {};
          result2.forEach(row => {
            baias[row.hostname] = row.baia;
          });

          // Exibir os resultados em uma tabela HTML
          let html = "<table id='minhatabela' class='display'>";
          html += "<thead><tr><th>Baia</th><th class='nome-logico'>Estação</th><th class='num-serie'>Num/Série</th><th class='userinv'>Usuário</th><th>Domínio</th><th class='processs'>Processador</th><th>Memória</th><th>IP ATUAL</th><th>HD TOTAL</th><th>HD Livre</th><th>% Livre</th></tr></thead>";
          html += "<tbody>";
          result1.forEach(row => {
            const percentual_livre = (row.free / row.total) * 100;
            const cell_class = (percentual_livre <= 15) ? "red" : "green";
            html += "<tr><td>" + baias[row.name] + "</td><td class='nome-logico'>".row.name + "</td><td class='num-serie'>" + row.ssn + "</td><td class='userinv'>" + row.userid + "</td><td>" + row.workgroup + "</td>";
            // Use a função substr para exibir apenas os primeiros 20 caracteres do valor da coluna processort
            html += "<td class='processs'>" + row.processort.substr(9, 28) + "</td>";
            html += "<td>" + row.memory + "</td><td>" + row.ipaddr + "</td><td>" + row.total + "</td><td>" + row.free + "</td><td class='" + cell_class + "'>" + Math.round(percentual_livre * 10) / 10 + "%</td></tr>";
          });
          html += "</tbody>";
          html += "</table>";

          console.log(html);
        });
      });