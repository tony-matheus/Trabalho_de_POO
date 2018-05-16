const list_template = ({ icon, onclick, name, price, complement, data, id }) => `
    <div class='media text-muted pt-3' data-menu='${data}' data-id='${id}' data-name='${name}' data-price='${price}' data-complement='${complement}'>
        <div class='button-${icon} m-r-1' onclick='${onclick}(this)'></div>
        <div class='media-body pb-3 mb-0 small lh-125 border-bottom border-gray'>
            <div class='d-flex justify-content-between align-items-center w-100'>
                <strong class='text-gray-dark'>${name}</strong>
                <span>R$ ${price}</span>
            </div>
            <span class='d-block'>${complement}</span>
        </div>
    </div>
`;

const list_order = ({ icon, onclick, name, price, complement, data, id, amount }) => `
    <li class="list-group-item d-flex justify-content-between lh-condensed" data-item='${data}${id}' data-menu='${data}' data-id='${id}' data-name='${name}' data-price='${price}' data-complement='${complement}' data-amount='${amount}'>
        <div>
            <h6 class="my-0"><span class="badge badge-secondary amount-${data}${id}"></span> ${name}</h6>
            <small class="text-muted">${complement}</small>
        </div>
        <span class="text-muted">R$ ${price}</span>
    </li>
`;

const list_finalize = ({ name, price, complement, data, id, amount }) => `
    <div class="card card-shadow" style="border: 0px;border-radius: .6rem;">
        <div class="card-body row">
            <div class="col-8">
                <h6 class="my-0"><span class="badge badge-secondary amount-"></span> ${name}</h6>
                <small class="text-muted">${complement}</small>
            </div>
            <div class="col-4 text-right">
                <h6 class="my-0"><span class="badge badge-secondary amount-"></span> ${amount}x R$ ${price}</h6>
                <small class="text-muted text-success">Total R$ ${amount * price}</small>
            </div>
        </div>
    </div>
`;

const select_option = ({value, id, data, text}) => `
    <option value="${value}" id="${id}" ${data}>${text}</option>
`;

const list_order_status = ({id, client, status, items, opacity, phone, total_items, date_hour, status_code}) => `
    <div class="col-4 ${opacity}" style="padding: 0px 3px;">
        <div class="card card-shadow">
            <div class="card-body">
                ${status}
                <h5 class="card-title m-0">${client}</h5>
                <small class="m-b-5"><i class="fas fa-phone"></i> ${phone}</small>
                <div class="card-text" style="padding:0.5em 0em">
                    ${items}
                    ${total_items}
                </div>
                <b class="p-t-5"><i class="far fa-calendar-alt"></i> ${date_hour}</b>
                <div style="margin: 10px -20px -20px -20px;padding:  10px;background: #6c3dc9;">
                    <div class="dropdown dropStatus" data-active-status="${status_code}">
                        <button class="btn btn-ligth dropdown-toggle" type="button" id="dropStatus" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Alterar Status
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropStatus">
                            <a class="dropdown-item" href="javascript:;" onclick="Order.UpdateStatus(${id}, 0)" data-status-code="0"><i class="fas fa-circle text-warning"></i> Em Espera</a>
                            <a class="dropdown-item" href="javascript:;" onclick="Order.UpdateStatus(${id}, 1)" data-status-code="1"><i class="fas fa-circle text-success"></i> Realizado</a>
                            <a class="dropdown-item" href="javascript:;" onclick="Order.UpdateStatus(${id}, 2)" data-status-code="2"><i class="fas fa-circle text-danger"></i> Cancelar</a>
                            <a class="dropdown-item" href="javascript:;" onclick="Order.UpdateStatus(${id}, 3)" data-status-code="3"><i class="fas fa-circle text-secundary"></i> Devolver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
`;

const table_delivery = ({ name, total, percent }) => `
    <tr>
        <td>${name}</td>
        <td>R$ ${total}</td>
        <td>R$ ${percent}</td>
    </tr>
`;

const table_items_orders = ({ product, total }) => `
    <tr>
        <td>${product}</td>
        <td>${total}</td>
    </tr>
`;
