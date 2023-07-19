/// <reference types="cypress" />
import { BASE_URL } from "../../../resources/js/env";

let username = "mkamugisha@innovationvillage.co.ug";
let password = "password";

const loginTest = (username: string = "mkamugisha@innovationvillage.co.ug", password: string = "password") => {
  cy.visit("/login");
  cy.get("[name=email]").type(username);
  cy.get("[name=password]").type(password);
  //cy.wait(4 * 1000)
  cy.get("button").first().click();
  cy.wait(4 * 1000);
  cy.location("origin").should("include", BASE_URL);
};

const logoutTest = () => {

  cy.get("[role=account-menu-dropdown]").first().click();
        cy.get("[data-menu-item-role=log-out-menu-button]").first().click();
        cy.wait(2 * 1000);
        cy.location("pathname").should("include", "login");

}

describe("Authentication", () => {
    beforeEach(() => {
        //cy.visit("/login");
    });

    it("user can login & log out", () => {
        loginTest(username, password);
        logoutTest();
    });

    it("An Error alert is shown if for invalid/wrong login credentials", () => {
        username = "mkamugisha@innovationvillage.co";
        password = "passwor";

        loginTest(username, password);
        cy.location("pathname").should("include", "login");
        cy.get("[data-error-alert=error-alert]").first().should("be.visible");
    });
});


export {loginTest, logoutTest};
