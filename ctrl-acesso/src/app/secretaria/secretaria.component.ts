import { Component, OnInit } from '@angular/core';
import { FirebaseListObservable, FirebaseObjectObservable, AngularFireDatabase } from 'angularfire2/database';

@Component({
  selector: 'secretaria',
  templateUrl: './secretaria.component.html',
  styleUrls: ['./secretaria.component.scss']
})
export class SecretariaComponent implements OnInit {
  lista: FirebaseListObservable<any>;
  text: string = '';

  constructor(db: AngularFireDatabase) {
    this.lista = db.list('/teste');
  }

  trocar(str:string, rgx, por:string=""){
    return str.replace(rgx,por);
  }

  importCSV(e) {
    var fileName = e.target.files[0];
    console.log(fileName);
    if (!fileName) {
      return;
    }
    var reader = new FileReader();

    reader.onload = file => {
      // let str : string = encodeURI(encodeURIComponent(reader.result));
      let str = encodeURI(reader.result);
      str = this.trocar(str,/;/gi);
      str = this.trocar(str,/%0D%0A/gi,'\n');
      str = this.trocar(str,/%20/gi,' ');
      str = this.trocar(str,/%22/gi,'"');
      str = this.trocar(str,/%EF%BF%BD%EF%BF%BDo/gi,'ção');
      this.text = str;
      console.log(this.text);
    }

    reader.readAsText(fileName);
  }

  save() {
    this.lista.push({
      "matricula": "31010004709",
      "nome": "TEFDSJDFKL ASLKDJF SDLFJ SDSDF",
      "campus": "IESI",
      "curso": "13901-IESI-SP - ASDFSDF FD BANISMO",
      "turma": "FSDFD545-3101",
      "aceite_contrato": "18/02/2016"
    });
  }
  
  update(key: string, json: any) {
    this.lista.update(key, json);
  }
  
  delete(key: string) {
    if (key == 'undefined') {
      this.lista.remove();
    } else {
      this.lista.remove(key); 
    }
  }

  ngOnInit() {
  }

}
