import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EditRewardComponent } from './edit-reward.component';

describe('EditRewardComponent', () => {
  let component: EditRewardComponent;
  let fixture: ComponentFixture<EditRewardComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ EditRewardComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(EditRewardComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
