import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { SecretariaEditComponent } from './secretaria-edit.component';

describe('SecretariaEditComponent', () => {
  let component: SecretariaEditComponent;
  let fixture: ComponentFixture<SecretariaEditComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ SecretariaEditComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(SecretariaEditComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
